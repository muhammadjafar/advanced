<?php 

namespace backend\controllers;


use Yii;
use davidjeddy/widget/PollWidget;

/**
 * Artikel_kategoriController implements the CRUD actions for ArtikelKategori model.
 */
class CobaController extends Controller
{       
        echo \davidjeddy\poll\PollWidget::widget([
        'questionText'  => \Yii::t('poll', 'Do you like PHP?'),
        'answerOptions' => ['Yes', 'No'],
        'params'        => [
            'backgroundLinesColor' => '#DCDCDC',// html hex
            'linesColor'           => '#DC0079' // html hex
            'linesHeight'          => 20,       // in pixels
            'maxLineWidth'         => 200,      // in pixels
        ]
    ])
?>