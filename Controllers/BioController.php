<?php

namespace Themes\AzokalTheme\Controllers;

use Themes\AzokalTheme\AzokalThemeApp;
use RZ\Roadiz\Core\Entities\Node;
use RZ\Roadiz\Core\Entities\Translation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * BioController class
 */
class BioController extends AzokalThemeApp
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


        $this->getService('stopwatch')->start('twigRender');
        return new Response(
            $this->getTwig()->render('types/bio.html.twig', $this->assignation),
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );
    }
}
