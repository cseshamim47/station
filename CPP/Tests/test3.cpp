//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;

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

bool search(binaryTreeNode* root, int item)
{
    if(root == NULL) return false;
    else if(root->data == item){
        cout << root->data << " found\n";
        return true;
    }else if(root->data >= item) search(root->left, item);
    else search(root->right,item);
    return false;
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

int main()
{
    binaryTreeNode* root = newBTnode(10);
    root->left = newBTnode(7);
    root->right = newBTnode(12);
    root->left->left = newBTnode(5);
    root->left->right = newBTnode(9);
    
    cout << "Inorder : ";
    inorderTraversal(root);

    int find;
    cout << "\nFind value : ";
    cin >> find;
    if(search(root,find)) cout << "Found!!" << endl;
    else cout << "NOT found!!" << endl;
    
}
