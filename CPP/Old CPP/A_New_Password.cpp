#include <bits/stdc++.h>
using namespace std;

int main()
{
    int len,dis;
    cin >> len >> dis;
    // stack<char>stk;
    queue<char>q,stk,cons;
    for(int i = 97; i <= 'z'; i++){
        char ch = (char)i;
        stk.push(ch);
        // q.push(ch);
        // cons.push(ch);
    }
    int p=0,k=0;
    for(int i = 1; i <= len; i++){
        if(i<=dis){
            cout << stk.front();
            q.push(stk.front());
            stk.pop();
        }else {
            cout << q.front();
            q.push(q.front());
            q.pop();
        }
    }
    
}