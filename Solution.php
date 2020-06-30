<?php

class Solution
{
    private $sum = 0;
    private $grandparents = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumEvenGrandparent($root)
    {
        $this->navigateNode($root, 0);
        return $this->sum;
    }

    function navigateNode($root, $currentDepth)
    {
        if ($root == null) {
            return null;
        }
        $currentDepth += 1;
        $root->depth = $currentDepth;

        $grandfather = $this->grandparents[$currentDepth] ?? null;
        if ($grandfather && ($grandfather->depth + 2) == $currentDepth) {
            $this->sum += $root->val;
        }

        $even = !($root->val % 2);
        if ($even) {
            $this->grandparents[$currentDepth + 2] = $root;
        }

        $node = $this->navigateNode($root->left, $currentDepth);
        if ($node == null) {
            $node = $this->navigateNode($root->right, $currentDepth);
        }
        return $node;
    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    public $depth = 0;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

