#include <bits/stdc++.h>
using namespace std;

int main()
{
    stack<int>stk;
    stk.push(1);
    stk.push(2);
    stk.push(3);
    stk.push(4);
    stk.push(5);
    

    while(!stk.empty()){
        cout << stk.top() << " ";
        stk.pop();
    }
}