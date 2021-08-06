#include <bits/stdc++.h>
using namespace std;

struct Node
{
    int data;
    Node *left;
    Node *right;
};

void levelOrder(Node *root)
{
    if(root == NULL) return;
    queue<Node*> q;
    q.push(root);

    while(!q.empty())
    {
        Node *tmp = q.front();
        cout << tmp->data << " ";
        q.pop();

        if(tmp->left != NULL)
        {
            q.push(tmp->left);
        }

        if(tmp->right != NULL)
        {
            q.push(tmp->right);
        }
    }
}

Node *addNode(int data)
{
    Node *newNode = new Node();
    newNode->data = data;
    newNode->left = NULL;
    newNode->right = NULL;

    return newNode;
}

int main()
{
    Node *head = addNode(1);
    head->left = addNode(2);
    head->right = addNode(3);
    head->left->left = addNode(4);
    head->left->right = addNode(5);

    levelOrder(head);
}
