#include <bits/stdc++.h>
using namespace std;
struct Node{
    int data;
    struct Node* left;
    struct Node* right;
};
Node* GetNewNode(int data){
    Node* newNode = new Node();
    newNode->data = data;
    newNode->left = newNode->right = NULL;
    return newNode;
}
Node* Insert(Node* root, int data){
    if(root == NULL){
        root = GetNewNode(data);
    }else if(data <= root->data){
        root->left = Insert(root->left,data);
    }else{
        root->right = Insert(root->right,data);
    }
    return root;
}

bool Search(Node* root, int data){
    if(root == NULL) return false;
    else if(root->data == data) return true;
    else if(root->data >= data) Search(root->left, data);
    else if(root->data < data) Search(root->right, data);
}

int main()
{
    Node* root;
    root = NULL;
    root = Insert(root,15);
    root = Insert(root,10);
    root = Insert(root,30);

    int number;
    cout << "Enter number to find : ";
    cin >> number;
    if(Search(root,number)) cout << "Found\n";
    else cout << "Not found\n";
    
    
}