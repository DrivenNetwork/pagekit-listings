<?php

namespace Driven\Listings\Controller;

use Pagekit\Application as App;
use Driven\Listings\Model\Template;

/**
 * @Access(admin=true)
 */
class TemplatesController
{

    public function indexAction()
    {

        $data = Template::query()->related('editor')->get();

        return [
            '$view' => [
                'title' => 'Templates',
                'name' => 'driven/listings:views/admin/index.templates.php'
            ],
            '$data' => $data
        ];
    }

    /**
     * @Route("/edit", name="/edit")
     * @Request({"id": "int"})
     */
    public function editAction($id = null)
    {

        try {

            $user = App::user();
            $now = time();

            if (!$template = Template::query()->where('id = ?', [$id])->first()) {

                if ($id) {
                    App::abort(404, __('Invalid listing id.'));
                }

                $template = [
                    'id' => 0,
                    'created_by' => $user->id,
                    'created_on' => $now,
                    'modified_by' => $user->id,
                    'modified_on' => $now,
                    'title' => '',
                    'description' => '',
                    'html' => '',
                    'editable' => 1
                ];

            }

            if (!$user->hasAccess('listings: manage templates')) {
                App::abort(403, __('Insufficient User Rights.'));
            }

            if (($id !== null) && ($template->locked)) {
                return App::redirect('@listings/templates/edit');
            }

            $payload = [
                '$view' => [
                    'title' => $id ? __('Edit Template') : __('Add Template'),
                    'name' => 'driven/listings:views/admin/edit-template.php'
                ],
                '$data' => [
                    'template' => $template
                ]
            ];

            return $payload;

        } catch (\Exception $e) {

            App::message()->error($e->getMessage());

            return App::redirect('@listings/templates');
        }

    }

    /**
     * @Request({"data": "array"}, csrf=true)
     **/
    public function saveAction($data)
    {
        $user = App::user();
        $id = $data['id'];
        $now = time();

        if (!$id || !$template = Template::find($id)) {

            $template = Template::create([
                'created_by' => $user->id,
                'created_on' => $now,
                'modified_by' => $user->id,
                'modified_on' => $now,
                'title' => $data['title'],
                'description' => $data['description'],
                'html' => $data['html'],
                'editable' => 1,
                'locked' => 0


            ]);
        } else {
            $template->modified_by = $user->id;
            $template->modified_on = $now;
            $template->title = $data['title'];
            $template->description = $data['description'];
            $template->html = $data['html'];
        }

        $template->save();

        return ['message' => 'success', 'template' => $template];

    }

    /**
     * @Request({"id": "integer", "type": "string"}, csrf=true)
     **/
    public function deleteAction($id)
    {
        $user = App::user();
        $now = time();
        $cached = [];


        if (!$id || !$template = Template::find($id)) {

            // Can't Find Listing

        } else {

            // TODO: Delete Children Categories & Items

            $cached = $template;
            $template->delete();
        }

        return ['message' => 'success', 'template' => $cached];
    }


}
