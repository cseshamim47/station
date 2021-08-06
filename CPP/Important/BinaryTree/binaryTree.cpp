#include <bits/stdc++.h>
using namespace std;

struct Node
{
    int data;
    Node* left;
    Node* right;

    Node(int value){
        data = value;
        left = NULL;
        right = NULL;
    }
};


int main()
{
    Node* root = new Node(10);

    root->left = new Node(5);
    root->right = new Node(15);

    root->left->left = new Node(4);
    root->left->right = new Node(7);

    cout << "            " << root->data << endl;
    cout <<"         "<< root->left->data << "      ";
    cout << root->right->data << endl;
    cout << "      " <<  root->left->left->data << "     ";
    cout << root->left->right->data << endl;
    
}