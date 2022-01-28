#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool isParenthisisBalanced(string str, int n)
{
    stack<char> stk;

    for(int i = 0; i < n; i++)
    {
        if(str[i] == '(') stk.push('(');
        else
        {
            if(!stk.empty())
            {
                stk.pop();
            }
            else
                return false;
        }
    }

    return stk.empty();
}

void solve()
{
    string str;
    cin >> str;

    int sz = str.size();
    char o = str[0];
    char c = str[sz-1];

    string nstr = "";
    for(int i = 0; i < sz; i++)
    {
        if(str[i] == o)
        {
            str[i] = '(';
            nstr += '(';
        }
        else if(str[i] == c) 
        {
            nstr += ')';
            str[i] = ')';
        }
        else
        {
            nstr += ')';
            str[i] = '(';
        }
    }

    // cout <<  nstr << endl;

    if(isParenthisisBalanced(str,sz) || isParenthisisBalanced(nstr,sz))
        cout << "YES" << endl;
    else cout << "NO" << endl;
    
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // cout << isParenthisisBalanced("()()()",7);
    w(t)
    //solve();
}

