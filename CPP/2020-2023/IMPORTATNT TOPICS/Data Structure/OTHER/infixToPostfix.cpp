#include <iostream>
#include <locale>  // for checking if char is alphanumeric or not
using namespace std;
#define MAX 10000005
#define gch getchar(); 
#define cls system("cls");

template<typename T>
class stack{
    T *Stack;
    int Top, MaxSize; 
    public:
    stack( int Size = 1 ){
        MaxSize = Size; //get Size
        Stack = new T[MaxSize]; //create array accordingly
        Top = 0; //start the stack
        }
    ~stack(){
	    delete[] Stack; //release the memory for stack
    }
    bool empty(){
        return (Top == 0); /*returns True if stack is empty*/
    }
    void resize(){
        //creates a new stack with a new capacity, MaxSize + Size
        T *tempStk = new T[ MaxSize * 2 ];
        //copy the elements from old to new stack
        for( int i=0; i<MaxSize; i++ ) tempStk[i] = Stack[i];
        MaxSize *= 2; //MaxSize increases by Size
        delete [] Stack; //release the old stack
        Stack = tempStk; //assign Stack with new stack
    }
    void push( T Element ){
        //inserts Element at the top of the stack
        if(full()) resize(); //increase size if full
        Stack[ Top++ ] = Element;
    }

    bool full(){
        /*returns True if stack is full*/
        return (Top == MaxSize  );
    }

    bool pop(){
        // removes top element from stack and puts it in
        if( empty() ) { return false; }
        Top--;
        // decreases size dynamically if Top is half of MaxSize
        if(MaxSize/2 == Top){
            T *tempStk = new T[ MaxSize / 2 ];
            for( int i=0; i<Top; i++ ) tempStk[i] = Stack[i];
            MaxSize /= 2; 
            delete [] Stack; 
            Stack = tempStk; 
        }
        return true;
    }

    T top(){
        //returns top element
        if(Top != 0) return Stack[Top-1];
    }

    void show(){
        //prints the whole stack from top to bottom
        if(empty()) { cout << "Stack empty\n"; return; }
        // cout << "Stack size : " << MaxSize << endl;
        // cout << "Total elements : " << Top << endl;
        // cout << "All Elements : \n";
        for( int i=Top-1; i>=0; i-- ) cout << Stack[i] << " "; 
        printf("\n");
    }
    int getCurSize(){ return MaxSize; }
};
int precedence(char ch);

int main()
{
    stack<char>stk;
    stk.push('#');
    string ifx,pofix = "";
    cout << "Enter infix expression without space : ";
    cin >> ifx;
    for(int i = 0; i < ifx.size(); i++){
        if(isalnum(ifx[i])) 
            pofix += ifx[i]; // isalnum checks if char is alphanumeric
        else if(ifx[i] == '(') 
            stk.push('(');
        else if(ifx[i] == ')') {
            while(stk.top() != '#' && stk.top() != '(') {
                pofix += stk.top(); //store and pop until ( has found
                stk.pop();
            }
            stk.pop();          //remove the '(' from stack
        }else {
            if(precedence(ifx[i]) > precedence(stk.top()))
                stk.push(ifx[i]); //push if precedence is high
            else {
                while(stk.top() != '#' && precedence(ifx[i]) <= precedence(stk.top())) {
                    pofix += stk.top();        //store and pop until higher precedence is found
                    stk.pop();
                }
                stk.push(ifx[i]);
            }
      }
    }
    while(stk.top() != '#') {
        pofix += stk.top();        
        stk.pop();
    }
    cout << "Postfix : " <<  pofix << endl;
    //a+b*c == ab*c+    
    // 4*5+(6-3)/3
}

int precedence(char ch) {
   if(ch == '+' || ch == '-') {
      return 1;              //Precedence of + or - is 1
   }else if(ch == '*' || ch == '/') {
      return 2;            //Precedence of * or / is 2           
   }else {
      return 0;
   }
}