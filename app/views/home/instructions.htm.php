<!--wizard-->
<?php echo $html->stylesheet(array("../scripts/wizard/css/style.css",));?>
<?php echo $html->script(array("wizard/js/wizard.js",)); ?>
<!--/wizard-->
<div id="wizard">
    <h3>Step </h3>
    <div id="wizardcontentwrap">
        <div id="wizardcontent"> </div>
    </div>
    <div class="buttons">
        <button type="submit" class="button" id="previous"> Back </button>
        <button type="submit" class="button" id="next"> Next </button>
    </div>
    <ul id="mainNav" class="fiveStep">
        <li><a title=""><em>1: Passo</em><span>clique</span></a></li>
        <li><a title=""><em>2: Passo</em><span>teste</span></a></li>
        <li><a title=""><em>3: Passo</em><span>memorize</span></a></li>
        <li><a title=""><em>3: Passo</em><span>memorize</span></a></li>
        <li class="mainNavNoBg"><a title=""><em>Step 5: Final</em> <span>Ok!</span></a></li>
    </ul>
    <div style="clear:both"></div>
</div>
<!-- Place markup for wizard content for each step below -->
<span class="wizardcontent" id="step_1">Welcome to the Wizard</span>
<span class="wizardcontent" id="step_2">You'll probably have more stuff here</span>
<span class="wizardcontent" id="step_3">Notice the wizard content is fading in each step</span>
<span class="wizardcontent" id="step_4">Notice the wizard content is fading in each step</span>
<span class="wizardcontent" id="step_5">Remove/Modify it if you like.</span>
