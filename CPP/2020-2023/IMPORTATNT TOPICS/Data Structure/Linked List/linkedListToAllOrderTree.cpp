//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

struct linkedList
{
    int data;
    linkedList *next;
};

struct binaryTreeNode
{
    int data;
    binaryTreeNode *left;
    binaryTreeNode *right;
};
binaryTreeNode* newBTnode(int data)
{
    binaryTreeNode* newNode = new binaryTreeNode();
    newNode->data = data;
    newNode->left = newNode->right = NULL;
    return newNode;
}
void convert(linkedList *head, binaryTreeNode* &root)
{
    queue<binaryTreeNode*>q;

    if(head == NULL)
    {
        root = NULL;
        return;
    }

    root = newBTnode(head->data);
    q.push(root);
    head = head->next;

    while(head)
    {
        binaryTreeNode* parent = q.front();
        q.pop();

        binaryTreeNode* leftChild = NULL;
        binaryTreeNode* rightChild = NULL;

        leftChild = newBTnode(head->data);
        q.push(leftChild);
        head = head->next;

        if(head)
        {
            rightChild = newBTnode(head->data);
            q.push(rightChild);
            head = head->next;
        }

        parent->left = leftChild;
        parent->right = rightChild;

    }
}

void inorderTraversal(binaryTreeNode* root)
{
    if(root)
    {
        inorderTraversal(root->left);
        cout << root->data << " ";
        inorderTraversal(root->right);
    }
}

void preOrderTraversal(binaryTreeNode* root)
{
    if(root)
    {
        cout << root->data << " ";
        preOrderTraversal(root->left);
        preOrderTraversal(root->right);
    }
}

void postOrderTraversal(binaryTreeNode* root)
{
    if(root)
    {
        postOrderTraversal(root->left);
        postOrderTraversal(root->right);
        cout << root->data << " ";
    }
}

void nodeAppend(linkedList** head_ref,int data)
{
    linkedList *newNode = new linkedList();
    newNode->data = data;
    newNode->next = *head_ref;
    *head_ref = newNode;
}

int main()
{
	linkedList *head = NULL;
	nodeAppend(&head,5);
	nodeAppend(&head,4);
	nodeAppend(&head,3);
	nodeAppend(&head,2);
	nodeAppend(&head,1);

    binaryTreeNode* root = NULL;
    convert(head,root);
    preOrderTraversal(root);
    cout << "\n";
    inorderTraversal(root);
    cout << "\n";
    postOrderTraversal(root);
}
