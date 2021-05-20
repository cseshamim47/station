#include <bits/stdc++.h>
using namespace std;

int main()
{
    stack<int>myStack,temp;

    myStack.push(1);
    myStack.push(2);
    myStack.push(3);
    myStack.push(4);
    myStack.push(5);

    printf("Size of the stack : %d\n", myStack.size());
    bool isEmpty = myStack.empty();
    
    if(isEmpty) printf("Empty\n");
    else printf("False. The Stack is not empty.\n");

    temp = myStack;

    while(!temp.empty()){
        printf("%d\n",temp.top());
        temp.pop();
    }

    printf("Size of the stack now : %d\n", temp.size());

    
}