//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

int op(char c)
{
    if(c=='+' || c=='-') return 1; 
    if(c=='*' || c=='/') return 2; 
    if(c=='^') return 3; 
    else return 0;
}
void solve()
{
    string str,ans = "";
    cin >> str;
    stack<char> stk,tmp;
    stk.push('#');

    for(int i = 0; i < str.size(); i++)
    {
        if(isalpha(str[i])) ans += str[i];
        else
        {
            if(str[i] == '(' || op(str[i]) > op(stk.top())) stk.push(str[i]);
            else 
            {
                while(stk.top() != '#' && (stk.top() != '(' && op(str[i]) <= op(stk.top())))
                {
                    ans.push_back(stk.top());
                    stk.pop();
                }
                if(stk.top() == '(')
                    stk.pop();
                if(str[i] != ')')
                    stk.push(str[i]);
            }

        }
    }

    while(stk.top() != '#')
    {
        ans.push_back(stk.top());
        stk.pop();
    }    
    cout << ans << "\n";
}

int main()
{
    int t;   cin >> t;   w(t);
}