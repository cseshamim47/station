//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh

#include <iostream>
using namespace std;

class MyStack{
    int *Stack, Top, MaxSize; 
    public:

    MyStack( int Size = 4 ){
        MaxSize = Size;
        Stack = new int[MaxSize];
        Top = 0;
    }

    ~MyStack(){ delete[] Stack; };
    
    bool isEmpty(); 
    bool isFull(); 
    void push(int Element); 
    bool pop(); 
    void topElement(); 
    void show(); 
    void resize();
    int getCurSize(){ return MaxSize; }
};

void resize();
void push( int Element );
bool isEmpty();
bool isFull();
bool pop();
void topElement();
void show();

int main()
{

    MyStack stk;
    stk.push(1);
    stk.push(1);
    stk.push(1);

    stk.show();
}


void MyStack:: resize(){
	int *tempStk = new int[ MaxSize * 2 ];
	for( int i=0; i<MaxSize; i++ ) tempStk[i] = Stack[i];
	MaxSize *= 2;
	delete [] Stack;
	Stack = tempStk;
}

void MyStack:: push( int Element ){
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
    cout << "Poped " << Stack[Top] << " successfully!!!\n";
    if(MaxSize/2 == Top){
        int *tempStk = new int[ MaxSize / 2 ];
        for( int i=0; i<Top; i++ ) tempStk[i] = Stack[i];
        MaxSize /= 2; 
        delete [] Stack; 
        Stack = tempStk; 
    }
	return true;
}

void MyStack ::  topElement(){
    if(Top != 0)
    cout << "\nTop Element : " << Stack[Top-1] << "\n";
    else cout << "\nStack Empty!!!\n";
}

void MyStack :: show(){
	if(isEmpty()) { cout << "Stack empty\n"; return; }
    cout << "Stack size : " << MaxSize << endl;
    cout << "Total elements : " << Top << endl;
    cout << "All Elements : \n";
	for( int i=Top-1; i>=0; i-- ) cout << Stack[i] << endl; 
}