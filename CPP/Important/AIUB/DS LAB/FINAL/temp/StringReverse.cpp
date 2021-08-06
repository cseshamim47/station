#include <iostream>
using namespace std;

class MyStack{
    char *Stack;
    int Top, MaxSize; 
    public:
    MyStack( int Size = 4 ){
        MaxSize = Size;
        Stack = new char[MaxSize];
        Top = 0;
    }
    ~MyStack(){ delete[] Stack; };
    bool isEmpty(); 
    bool isFull(); 
    void push(char Element); 
    bool pop(); 
    void topElement(); 
    void show(); 
    void resize();
};

void resize();
void push( char Element );
bool isEmpty();
bool isFull();
bool pop();
void show();


int main()
{

    string str;
    getline(cin,str);

    MyStack stk;
    for(int i = 0; i < str.length(); i++){
        stk.push(str[i]);
    }
    stk.show();
}


void MyStack :: show(){
	if(isEmpty()) { cout << "Stack empty\n"; return; }

	for( int i=Top-1; i>=0; i-- ){
         cout << Stack[i];
         pop();
    } 
}

void MyStack:: resize(){
	MaxSize *= 2;
	char *tempStk = new char[ MaxSize ];
	for( int i=0; i<MaxSize; i++ ) tempStk[i] = Stack[i];
	delete [] Stack;
	Stack = tempStk;
}

void MyStack:: push( char Element ){
	if(isFull()) resize();
 	Stack[ Top++ ] = Element;
}

bool MyStack :: isEmpty(){
    return (Top == 0);
}

bool MyStack :: isFull(){
	return (Top == MaxSize);
}

bool MyStack :: pop(){
	if( isEmpty() ) { cout << "Stack empty\n"; return false; }
	Top--;
    if(MaxSize/2 == Top){
        MaxSize /= 2; 
        char *tempStk = new char[ MaxSize ];
        for( int i=0; i<Top; i++ ) tempStk[i] = Stack[i];
        delete [] Stack; 
        Stack = tempStk; 
    }
	return true;
}

