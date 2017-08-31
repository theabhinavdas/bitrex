<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'signup-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false
    ),
    'htmlOptions'=>array(
        'class'=>'form-signin',
    ),
    'action' => array( 'signup' )
)); ?>
    <div class="text-center">
        <img src="../images/science-blockchain.png" class="logo">
        <h2>Sign Up</h2>
    </div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo $form->textField($model,'email', array('class'=>'form-control', 'type'=>'email', 'id'=>'inputEmail','placeholder'=>'Email address', 'name'=>'email')); ?>
    <label for="inputPassword" class="sr-only">Password</label>
    <?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'id'=>'inputPassword','placeholder'=>'Password', 'name'=>'password')); ?>
    <?php echo CHtml::submitButton('Create Account', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
    <hr/>
    <a href="login">Already have an account? Login here</a>
<?php $this->endWidget(); ?>