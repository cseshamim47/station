//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <iostream>
#include <locale>
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

int precedence(char ch) {
   if(ch == '+' || ch == '-') {
      return 1;              //Precedence of + or - is 1
   }else if(ch == '*' || ch == '/') {
      return 2;            //Precedence of * or / is 2           
   }else {
      return 0;
   }
}

int main()
{
    queue q;
	q.enqueue('#');
	string ifx,pofix = "";
	cout << "Enter infix expression without space : ";
    cin >> ifx;
	
	// string tmp = ifx;
	// ifx = "";
	// int j = 0;
	// for(int i = tmp.size()-1; i >= 0; i--){
	// 	ifx += tmp[i];
	// 	j++;
	// }


	for(int i = 0; i < ifx.size(); i++){
        if(isalnum(ifx[i])) 
            pofix += ifx[i]; // isalnum checks if char is alphanumeric
        else if(ifx[i] == '(') 
			q.enqueue('('); 
        else if(ifx[i] == ')'){
            while(q.front() != '#' && q.front() != '(') {
                pofix += q.front(); //store and pop until ( has found
                q.dequeue();
            }
            q.dequeue();          //remove the '(' from stack
        }else {
            if(precedence(ifx[i]) > precedence(q.front())){
				q.enqueue(ifx[i]); //push if precedence is high
				// cout << q.back() << endl; working
			}
            else{
                while(q.front() != '#' && precedence(ifx[i]) >= precedence(q.front())) {
                    pofix += q.front();        //store and pop until higher precedence is found
					// cout << "q.front()" << endl;
                    q.dequeue();
					
                }
                q.enqueue(ifx[i]);
				// cout << q.back() << endl;
            }
      	}
    }
	
	while(q.front() != '#') {
        pofix += q.front();        
        q.dequeue();
    }

	cout << "Postfix : " <<  pofix << endl;

    
}

// a+b*c

// abc 
// +*