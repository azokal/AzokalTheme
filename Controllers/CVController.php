<?php
/*
 * Copyright REZO ZERO 2014
 *
 * Description
 *
 * @file ExampleController.php
 * @copyright REZO ZERO 2014
 * @author Ambroise Maupate
 */

namespace Themes\AzokalTheme\Controllers;

use Themes\AzokalTheme\AzokalThemeApp;
use RZ\Roadiz\Core\Entities\Node;
use RZ\Roadiz\Core\Entities\Translation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CVController class
 */
class CVController extends AzokalThemeApp
{
    /**
     * {@inheritdoc}
     */
    public function indexAction(
        Request $request,
        Node $node = null,
        Translation $translation = null
    ) {

        $this->prepareThemeAssignation($node, $translation);

        $nodeType = $this->getService('nodeTypeApi')->getOneBy(["displayName" => "Info"]);

        $nodes = $this->getService('nodeApi')->getBy(
            [
                'translation' => $translation,
                'parent' => null,
                'home' => false,
                'status' => Node::PUBLISHED,
                'nodeType' => $nodeType
            ]
        );

        $nodeType = $this->getService('nodeTypeApi')->getOneBy(["name" => "Project"]);

        $project = $this->getService('nodeSourceApi')->getOneBy(
            [
                'translation' => $translation,
                'node.home' => false,
                'node.status' => Node::PUBLISHED,
                'node.nodeType' => $nodeType
            ]
        );

        $this->assignation['nodes'] = $nodes;
        $this->assignation['project'] = $project;

        $this->getService('stopwatch')->start('twigRender');
        return new Response(
            $this->getTwig()->render('types/cv.html.twig', $this->assignation),
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );
    }
}
