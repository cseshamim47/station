#include <iostream>

using namespace std;

class Node{

    public:
        int data;
        Node *next;
};

    Node* getNode(int index,Node *head)
    {
        switch(index)
        {
        case 0:
            return head;
        case 1:
            return head->next;
        case 2:
            return head->next->next;
        case 3:
            return head->next->next->next;
        case 4:
            return head->next->next->next->next;
        }
    }
    int getFullRange(Node *head)
    {
        int i=0;
        while (head != NULL)
        {
            i++;
            head = head->next;
        }
        return i;
    }
    void binarySearch(int item, Node *head)
    {
        int low =0;
        int range=getFullRange(head);
        int mid;

        while(range >= low)
            {
                mid = (low+range)/2;
                int midValue=getNode(mid, head)->data;
                if(midValue == item)
                {
                    cout<<"Item "<<item<<"found at:"<<mid<<" index";
                    break;
                }
                if( midValue < item)
                {
                    low = mid+1;
                }
                else
                {
                    range =mid-1;
                }
            }
            cout<<endl;
    }
    void print(Node *head)
    {
        while (head != NULL)
        {
            cout<<"Node value is: " <<head->data <<endl;
            head = head->next;
        }
    }
int main()
{
    Node *head = NULL;
    Node *second = NULL;
    Node *third = NULL;
    Node *fourth = NULL;
    Node *fifth = NULL;

    head  = new Node();
    second = new Node();
    third  = new Node();
    fourth = new Node();
    fifth  = new Node();

    head->data = 10;
    head->next = second;

    second->data = 20;
    second->next = third;

    third->data =30;
    third->next = fourth;

    fourth->data = 40;
    fourth->next = fifth;

    fifth->data =50;
    fifth->next = NULL;

    print(head);
    cout<<endl;
    binarySearch(40, head);
    cout<<endl;
    print(head);


    return 0;
}