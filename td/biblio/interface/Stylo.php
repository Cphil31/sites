<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stylo
 *
 * @author STAGIAIRE
 */
class Stylo implements Jetable, Recyclable {

    public function jeter() {
        echo "Le stylo est incinéré ";
    }

    public function recycler() {
        echo "Le stylo est recyclé ";
    }

}
