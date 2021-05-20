#include <bits/stdc++.h>
using namespace std;

int main()
{
    queue<int>myQueue;

    myQueue.push(10);
    myQueue.push(20);
    myQueue.push(30);
    myQueue.push(40);
    myQueue.push(80);

    printf("Size of the queue : %d\n", myQueue.size());
    printf("Front : %d\n",myQueue.front());
    printf("Back : %d\n",myQueue.back());

    printf("\nTraversal : \n");
    while(!myQueue.empty()){
        printf("%d\n",myQueue.front());
        myQueue.pop();
    }

    printf("\nSize of the queue : %d\n", myQueue.size());
    printf("Front : %d\n",myQueue.front());
    printf("Back : %d\n\n",myQueue.back());
    
    
}