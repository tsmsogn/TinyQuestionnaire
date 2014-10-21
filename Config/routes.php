<?php
Router::connect('/tiny_questionnaire', array('plugin' => 'TinyQuestionnaire', 'admin' => false, 'controller' => 'questionnaires', 'action' => 'index'));
Router::connect('/tiny_questionnaire/:controller', array('plugin' => 'TinyQuestionnaire', 'admin' => false, 'action' => 'index'));
Router::connect('/tiny_questionnaire/:controller/:action/*', array('plugin' => 'TinyQuestionnaire', 'admin' => false));
Router::connect('/admin/tiny_questionnaire', array('plugin' => 'TinyQuestionnaire', 'admin' => true, 'controller' => 'questionnaires', 'action' => 'index'));
Router::connect('/admin/tiny_questionnaire/:controller', array('plugin' => 'TinyQuestionnaire', 'admin' => true, 'action' => 'index'));
Router::connect('/admin/tiny_questionnaire/:controller/:action/*', array('plugin' => 'TinyQuestionnaire', 'admin' => true));
