//Author :   Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
 
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
    char topElement(); 
    void show(); 
    void resize();
};

void resize();
void push( char Element );
bool isEmpty();
bool isFull();
bool pop();
void show();
char topElement();

bool balancedParanthesis(string str);

int main()
{

    string str;
    getline(cin,str);

    if(balancedParanthesis(str)) cout << "Balanced" << endl;
    else cout << "Not Balanced" << endl;
    
}

bool balancedParanthesis(string str){
    MyStack stk;
    for(int i = 0; i < str.size(); i++){

        if(str[i] == '{' || str[i] == '(' || str[i] == '[') stk.push(str[i]);
        else if(str[i] == '}' || str[i] == ']' || str[i] == ')'){
            if(!stk.isEmpty() && ( stk.topElement() == '(' && str[i] == ')') ) stk.pop();
            else if(!stk.isEmpty() && ( stk.topElement() == '{' && str[i] == '}') ) stk.pop();
            else if(!stk.isEmpty() && ( stk.topElement() == '[' && str[i] == ']') ) stk.pop();
            else return false;
        }
    }
    return stk.isEmpty();
}

char MyStack :: topElement(){
    if(Top != 0)
        return Stack[Top-1];
    else return '-';
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
	for( int i=0; i<Top; i++ ) tempStk[i] = Stack[i];
	delete [] Stack;
	Stack = tempStk;
}

void MyStack:: push( char Element ){
	if(isFull()) resize();
 	Stack[ Top ] = Element;
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
        char *tempStk = new char[ MaxSize / 2 ];
        for( int i=0; i<Top; i++ ) tempStk[i] = Stack[i];
        MaxSize /= 2; 
        delete [] Stack; 
        Stack = tempStk; 
    }
	return true;
}


