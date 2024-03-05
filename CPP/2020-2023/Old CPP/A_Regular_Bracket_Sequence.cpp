#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

bool validBS(string str)
{
    if(str.size() & 1)
    {
        return false;
    }
    stack<char> stk;
    stack<char> stk2;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == '?' || str[i] == '(')
        {
            if(str[i] == '(') stk.push('(');
            else if(stk2.empty()) stk2.push('?');
            else stk2.pop();
            if(!stk2.empty() && !stk.empty()) stk.pop(),stk2.pop();
        }else 
        {
            if(str[i] == ')' && !stk.empty()) stk.pop();
            else if(!stk2.empty()) stk2.pop();
            else return false;
        }
    }    
    return stk.empty() && stk2.empty();
}

void solve()
{
    string str;
    cin >> str;

    if(str[0] == ')' || str[str.size()-1] == '(' || str.size() % 2 != 0) cout << "NO" << endl;
    else cout << "YES" << endl;
    
}



int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}