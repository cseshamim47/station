//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

struct node
{
    int data;
    node *left;
    node *right;
};

int height(node *root)
{
    if(root == NULL) return 0;
    else
    {
        int lheight = height(root->left);
        int rheight = height(root->right);

        if(lheight>rheight) return lheight+1;
        else return rheight+1;
    }
}

void printLevel(node *root,int i)
{
    if(root == NULL) return;
    else if(i == 1) cout << root->data << " ";
    else
    {
        printLevel(root->left,i-1);
        printLevel(root->right,i-1);
    }
}

void driver(node *root)
{
    int treeHeight = height(root);
    for(int i = 1; i <= treeHeight; i++)
        printLevel(root,i);
}


node* nodeMake(int data)
{
    node *newNode = new node();
    newNode->data = data;
    newNode->left = NULL;
    newNode->right = NULL;

    return newNode;
}


int main()
{
	node *head = nodeMake(1);
	head->left = nodeMake(2);
	head->right = nodeMake(3);
	head->left->left = nodeMake(4);
	head->left->right = nodeMake(5);

	driver(head);
}
