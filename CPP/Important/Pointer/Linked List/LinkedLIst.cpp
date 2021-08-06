//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;
#define MAX 10000005

struct NODE{
    int data;
    NODE *next;
};
NODE *head = new NODE();

void print(NODE *ptr){
    while(ptr != NULL){
        cout << ptr->data << " ";
        ptr = ptr->next;
    }
}

bool find(NODE *curr,int data){
    while(curr != NULL){
        if(curr->data == data) return true;
        curr = curr->next;
    }
    return false;
}

void insertAIUB(NODE *prev,int data){
    // NODE *curr = new NODE();
    NODE *insert = new NODE();
    insert->data = data;
    if(prev == head){
        insert->next = head;
        head = insert;
    }else if(prev != NULL){
        insert->next = prev->next;
        prev->next = insert;
    }
}

void insertAfter(NODE *curr,int after,int data){
    while(curr != NULL){
        if(curr->data == after){
            NODE *insert = new NODE();
            insert->data = data;
            insert->next = curr->next;
            curr->next = insert;
            break;
        }else curr = curr->next;
    }
}

NODE *insertAtHead(NODE *head,int data){
    NODE *insert = new NODE();
    NODE *curr = new NODE();
    if(head != NULL){
        insert->data = data;
        insert->next = head;
        head = insert;
    }
    return head;
}

void deleteAfterNODE(NODE *node){
    if(node != NULL && node->next != NULL){
        node->next = node->next->next;
    }
}

void deleteHead(){
    if(head != NULL && head->next != NULL){
        head = head->next;
    }
    // return head;
}

void deleteAfterNodeAIUB(NODE *prev){
    NODE *curr = new NODE();
    if(prev == head) head = head->next;
    else if(prev != NULL){
        curr = prev->next;
        prev->next = curr->next;
    }
    // print(head);
}


int main(){
    NODE *second = NULL;
    NODE *third = NULL;

    // head = new NODE();
    second = new NODE();
    third = new NODE();

    head->data = 1;
    head->next = second;
    
    second->data = 2;
    second->next = third;


    third->data = 5;
    third->next = NULL;

    // insertAfter(head,2,3);
    // head = insertAtHead(head,0);
    // head = insertAtHead(head,-1);
    // deleteAfterNODE(head);
    // deleteHead();
    // deleteAfterNodeAIUB(head);
    // deleteAfterNodeAIUB(second);
    // deleteAfterNodeAIUB(second->next);

    insertAIUB(third,7);
    insertAIUB(third,6);
    print(head);

    if(find(head,100)) cout << endl << "Found" << endl;
    else cout << endl << "Not found" << endl;


}