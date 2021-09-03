//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;
#define MAX 10000005

struct NODE{
    int data;
    NODE *prev;
    NODE *next;
};

NODE *head = new NODE();

void headNxt(){
    head = head->next;
}

void del(NODE *prev){
    if(prev == NULL){
         head = head->next;
    }else if(prev->next != NULL){
        NODE *curr;
        curr = prev->next;
        prev->next = curr->next;
    }
}
// null -> 0 1 2 20 3 4 5
void ins(NODE *insertAfter,int data){

    NODE *currPos = new NODE();
    currPos->data = data;

    if(insertAfter == NULL){
        currPos->next = head;
        currPos->prev = NULL;
        head = currPos;
    }else if(insertAfter->next == NULL){
        insertAfter->next = currPos;
        currPos->next = NULL;
        currPos->prev = insertAfter;
    }else{
        currPos->next = insertAfter->next;
        insertAfter->next = currPos;
    }
    // else if(insertAfter->prev == NULL)
}

void search(NODE *curr, int data){
    while(curr != NULL){
        if(curr->data == data){
            cout << "FOUND" << endl;
            return;
        }
        curr = curr->next;
    }
    cout << "NOT FOUND" << endl;
}

int main()
{
    NODE *second = new NODE();
    NODE *third = new NODE();

    head->prev = NULL;
    head->data = 1;
    head->next = second; 

    second->prev = head;
    second->data = 2;
    second->next = third;

    third->prev = second;
    third->data = 3;
    third->next = NULL;


    del(third);

    ins(third,4);
    ins(NULL,0);
    ins(second,20);
    
    search(head,200);
    NODE *temp = head;

    while(temp != NULL){
        cout << temp->data << " -> ";
        temp = temp->next;
    }
    
}