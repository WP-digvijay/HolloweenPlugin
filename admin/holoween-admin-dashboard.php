<?php
    if(!defined('ABSPATH')){
        exit();
    }
?>
<style>
.input-switch {
    display: none !important;
}
.label-switch {
    display: inline-block;
    position: relative;
}
.label-switch::before, .label-switch::after {
    content: "";
    display: inline-block;
    cursor: pointer;
    transition: all 0.5s;
}
.label-switch::before {
    width: 3em;
    height: 1em;
    border: 1px solid #757575;
    border-radius: 4em;
    background: #888888;
}
.label-switch::after {
    position: absolute;
    left: 0;
    top: -6%;
    width: 1.5em;
    height: 1.5em;
    border: 1px solid #757575;
    border-radius: 4em;
    background: #ffffff;
}
.input-switch:checked ~ .label-switch::before {
    background: #00a900;
    border-color: #008e00;
}
.input-switch:checked ~ .label-switch::after {
    left: unset;
    right: 0;
    background: #00ce00;
    border-color: #009a00;
}
.info-text {
    display: inline-block;
}
.info-text::before {
    content: "Not active";
}
.input-switch:checked ~ .info-text::before {
    content: "Active";
}
</style>
<section class="m-2 p-2">
<h1 class="m-4">Holloween Animation List</h1>
<table class="table ml-2 mr-4 border table-striped">
    <thead>
        <tr>
            <th scope="col">Sr.</th>
            <th scope="col">Name of Animation</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">1</td>
            <td scope="row">Halloween Pumpkin and Spider</td>
            <td scope="row">
                <input class='input-switch' type="checkbox" id="first_animation" data-animation-id="first_animation" <?php echo $first_active ? 'checked' : ''; ?>/>
                <label class="label-switch" for="first_animation"></label>
                <span class="info-text"></span>
            </td>
        </tr>
        <tr>
            <td scope="row">2</td>
            <td scope="row">Halloween ghost out of box</td>
            <td scope="row">
                <input class='input-switch' type="checkbox" id="second_animation" data-animation-id="second_animation" <?php echo $second_active ? 'checked' : ''; ?>/>
                <label class="label-switch" for="second_animation"></label>
                <span class="info-text"></span>
            </td>
        </tr>
        <tr>
            <td scope="row">3</td>
            <td scope="row">Ghost follow around cursor</td>
            <td scope="row">
                <input class='input-switch' type="checkbox" id="third_animation" data-animation-id="third_animation" <?php echo $third_active ? 'checked' : ''; ?>/>
                <label class="label-switch" for="third_animation"></label>
                <span class="info-text"></span>
            </td>
        </tr>
    </tbody>
</table>
</section>
