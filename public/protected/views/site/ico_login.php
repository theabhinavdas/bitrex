<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false
    ),
    'htmlOptions'=>array(
        'class'=>'form-signin',
    ),
    'action' => array( 'login' )
)); ?>
    <div class="text-center logoTitle">
        <img src="../images/science-blockchain.png" class="logo">
        <h2>Login</h2>
    </div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo $form->textField($model,'email', array('class'=>'form-control', 'type'=>'email', 'id'=>'inputEmail','placeholder'=>'Email address', 'name'=>'email')); ?>
    <label for="inputPassword" class="sr-only">Password</label>
    <?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'id'=>'inputPassword','placeholder'=>'Password', 'name'=>'password')); ?>
    <?php echo CHtml::submitButton('Sign In', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
    <hr/>
    <a href="signup">Don't have an account? Sign up here</a>
<?php $this->endWidget(); ?>
