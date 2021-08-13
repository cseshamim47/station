#include <iostream>
using namespace std;

struct NODE
{
    int data;
    NODE *next;
};

void print(NODE *head)
{
    while(head != NULL)
    {

        cout << head->data << " -> ";

        head = head->next;
    }
    cout << " NULL ";
}

int main()
{
    NODE *head = NULL;
    NODE *second = NULL;
    NODE *third = NULL;

    head = new NODE();
    second = new NODE();
    third = new NODE();

    head->data = 10;
    head->next = second;

    second->data = 20;
    second->next = third;

    third->data = 30;
    third->next = NULL;

    print(head);

}
