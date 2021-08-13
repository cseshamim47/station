//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;

class BST
{
    int data;
    BST *left, *right;

public:
    BST();
    BST(int);

    BST* Insert(BST*,int);
    BST* Delete(BST*, int);
    BST* findSuccessor(BST*);
    bool Search(BST*,int);
    void inorder(BST*);
    void level(BST*,int);

};

BST::BST():data(0),left(NULL),right(NULL)
{
}

BST* BST::findSuccessor(BST* root)
{
    BST* tmp = NULL;
    if(root->left == NULL) return root;
    tmp = findSuccessor(root->left);
    return tmp;
}

BST* BST::Delete(BST* root, int deldata)
{
    if(!root) return root;

    if(deldata < root->data)
        root->left = Delete(root->left, deldata);
    else if(deldata > root->data)
        root->right = Delete(root->right, deldata);
    else
    {
        if(root->right == NULL && root->left == NULL)
            return NULL;
        else if(root->right == NULL && root->left != NULL)
        {
            BST* tmp = root->left;
            free(root);
            return tmp;
        }
        else if(root->left == NULL && root->right != NULL)
        {
            BST* tmp = root->right;
            free(root);
            return tmp;
        }
        else
        {
            BST* smallest = findSuccessor(root->right);
            root->data = smallest->data;
            root->right = Delete(root->right,smallest->data);
        }
    }
    return root;

}


BST::BST(int value)
{
    data = value;
    left = right = NULL;
}

BST* BST::Insert(BST* root, int value)
{
    if(!root) return new BST(value);

    if(value > root->data)
        root->right = Insert(root->right,value);
    else root->left = Insert(root->left, value);
    return root;
}

void BST::inorder(BST* root)
{
    if(!root) return;

    inorder(root->left);
    cout << root->data << endl;
    inorder(root->right);
}

bool BST::Search(BST* root,int data)
{
    if(root == NULL) return false;
    if(root->data == data) return true;

    if(data < root->data)
        return Search(root->left,data);
    else
        return Search(root->right,data);
}

void BST::level(BST* root,int lvl)
{
    if(lvl==1)
    {
        cout << root->data << " ";
        return;
    }

    level(root->left,lvl-1);
    level(root->right,lvl-1);

}

int main()
{
    BST bst, *root = NULL;

    root = bst.Insert(root,50);
    bst.Insert(root,30);
    bst.Insert(root,20);
    bst.Insert(root,40);
    bst.Insert(root,70);
    bst.Insert(root,60);
    bst.Insert(root,80);


    bst.inorder(root);

    cout << "--------" << endl;
    BST* tmp = root;
    bst.Delete(tmp,30);
    bst.inorder(root);
    cout << "--------" << endl;
    bst.Delete(tmp,50);
    bst.inorder(tmp);
    cout << "--------" << endl;
    if(bst.Search(root,100)) cout << "FOUND!!" << "\n";
    else cout << "NOT FOUND!!!" << "\n";

    return 0;
}
