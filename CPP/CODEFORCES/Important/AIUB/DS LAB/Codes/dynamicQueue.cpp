//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
using namespace std;

class queue{
    int maxSize=4, frontIdx, backIdx,curIdx;
    char *Queue;
    public:
        queue(){
            Queue = new char[maxSize]; 
            frontIdx = backIdx = -1;
            curIdx = 0;
        }
        ~queue(){ delete[] Queue; }
        bool empty(){
            if((frontIdx == -1) and (backIdx == -1)){
                return true;
            }else return false;
        }
        bool full(){
            if(backIdx == (maxSize-1)){
               return true;
            }return false;
        }
        char front(){
            if(empty()){
                cout << "Queue empty!\n";
                abort();
            }
            return Queue[frontIdx]; 
        }
        char back(){
            if(empty()){
                cout << "Queue empty!\n";
                abort();
            }
            return Queue[backIdx]; 
        }
        void enqueue(char data){ 
            if(full()){
                maxSize *= 2;
                char *tempQ = new char[maxSize];
                for(int i = 0; i < curIdx; i++)
                    tempQ[i] = Queue[i];
                delete[] Queue;
                Queue = tempQ;
            }
            if(empty()){
                frontIdx = backIdx = 0;
                Queue[backIdx] = data;
                curIdx++;
            }else{
                backIdx = (backIdx+1) % maxSize;
                Queue[backIdx] = data;
                curIdx++;
            }
        }
        void dequeue(){
            if(empty()){
                cout << "Queue is empty! dequeue is not possible\n";
            }else if(backIdx == frontIdx){
                frontIdx = backIdx = -1;
                curIdx--;
            }else{
                frontIdx = (frontIdx+1)%maxSize;
                curIdx--;
            }
        }
        int size(){
            return curIdx;
        }
        int maxsize(){
            return maxSize;
        }
};

int main()
{
    queue obj;
    obj.enqueue('5');
    obj.enqueue('4');
    obj.enqueue('3');
    obj.enqueue('3');

    for(int i = 0; i < obj.maxsize(); i++){
        cout << obj.front() << endl;
        obj.dequeue();

    }
    
}