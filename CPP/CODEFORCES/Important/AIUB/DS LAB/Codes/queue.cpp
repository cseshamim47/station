#include <iostream>
using namespace std;
#define MAX 4
class Queue{
    int maxSize, front, rear;
    int q[MAX];
    public:
        Queue(){
            front = -1; 
            rear = -1;
            maxSize = MAX;
        }
        bool isEmpty(){
            if((front == -1) and (rear == -1)){
                return true;
            }else return false;
        }
        bool isFull(){
            if(rear == (maxSize-1)){
                return true;
            }else return false;
        }
        void enqueue(int val){ 
            if(isFull()){
                cout << "Queue is full!!!\n";
            }else if(isEmpty()){
                front = rear = 0;
                q[rear] = val;
            }else{
                rear++;
                q[rear] = val;
            }
        }
        void dequeue(){
            if(isEmpty()){
                cout << "Queue is empty! Dequeue is not possible\n";
            }else if(rear == front){
                front = rear = -1;
            }else front++;
        }
};

int main()
{
    
    int x;
    cin >> x;

    Queue myQ;



    if(myQ.isEmpty()) cout << "Queue is Empty!!" << endl;
    else cout << "Queue is not Empty!!" << endl;
    myQ.enqueue(1); 
    myQ.enqueue(2); 
    myQ.enqueue(3); 
    myQ.enqueue(4);
    myQ.enqueue(5);
    myQ.dequeue();
    myQ.dequeue();
    myQ.dequeue();
    myQ.dequeue();
    myQ.dequeue();
}