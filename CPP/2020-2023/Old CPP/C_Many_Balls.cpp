#include <bits/stdc++.h>
using namespace std;
#define ll long long
#define bl '\n'

int main()
{
    ll n;
    cin >> n;
    int cnt = 0;
    stack<char>stk;
    while(n != 0)
    {
        if(n&1)
        {
            stk.push('A');
            n--;
        }
        else
        {
            stk.push('B');
            n/=2;
        }
    }

    while(!stk.empty())
    {
        cout << stk.top(); 
        stk.pop();
    }
    cout << endl;
}