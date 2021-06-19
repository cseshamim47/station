#include <iostream>
using namespace std;

class Queue{
    int maxSize, front, rear;
    int q[4];
    public:
        Queue(){
            front = -1; // front element or pop element arr[2]
            rear = -1;
            maxSize = 4;
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
        void enqueue(int val){ // push - back to front
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
        int frontElement(){
            return q[front];
        }
        void showQueue(){
            if(isEmpty()){
                cout << "Nothing to show! Queue empty!\n";
            }else{
                // while(!isEmpty()){
                //     cout << frontElement() << " ";
                //     dequeue();
                // } 
                for(int i = front; i <= rear; i++){
                    cout << q[i] << " ";
                }
            }
        }
};

int main()
{
    Queue myQ;

    if(myQ.isEmpty()) cout << "Queue is Empty!!" << endl;
    else cout << "Queue is not Empty!!" << endl;
    myQ.enqueue(1); 
    myQ.enqueue(2); 
    myQ.enqueue(3); 
    myQ.enqueue(4);
    // myQ.dequeue();
    // myQ.dequeue();
    // myQ.dequeue();
    // myQ.enqueue(1);
    // if(myQ.isFull()) cout << "Queue is full!!" << endl;
    // else cout << "Queue is not full!!" << endl;
    cout << "Show Queue : ";
    myQ.showQueue();

    // cout << endl;
    // myQ.enqueue(1); 
    // myQ.enqueue(2); 
    // myQ.enqueue(3); 
    // myQ.enqueue(4);
    
    // cout << "Show Queue : ";
    // myQ.showQueue();
}