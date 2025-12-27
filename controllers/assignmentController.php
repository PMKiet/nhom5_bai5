<?php
require_once __DIR__ . '../../models/AssignmentModal.php';
require_once __DIR__ . '../../config/base_url.php';

function listAssignmentAction()
{
    $assignment = new AssignmentModal();
    $listAssignment = $assignment->getAllAssignment();
    return $listAssignment;
}
