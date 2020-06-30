<?php

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumEvenGrandparent($root)
    {
        $this->navigateNode($root, 0, function (TreeNode $root) {
            echo '';
        });
    }

    function navigateNode($root, $currentDepth, $callback)
    {
        if ($root == null) {
            return null;
        }
        $currentDepth += 1;
        $root->depth = $currentDepth;
        $callback($root);

        $node = $this->navigateNode($root->left, $currentDepth, $callback);
        if ($node == null) {
            $node = $this->navigateNode($root->right, $currentDepth, $callback);
        }
        return $node;
    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

