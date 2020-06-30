<?php
require "Solution.php";

$root = new TreeNode(6, new TreeNode(7, new TreeNode(2, new TreeNode(9)), new TreeNode(7, new TreeNode(1), new TreeNode(4))), new TreeNode(8, new TreeNode(1), new TreeNode(3, null, new TreeNode(5))));

$solution = new Solution();
echo $solution->sumEvenGrandparent($root);
