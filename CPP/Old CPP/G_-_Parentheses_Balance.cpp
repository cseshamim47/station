#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

// ([()[]()])()

bool f(string str)
{
    stack<char> stk;
    for(int i = 0; i < str.size(); i++)
    {
        if(str[i] == ')')
        {
            if(!stk.empty())
            {
                if(stk.top() == '(')
                stk.pop();
                else return false;
            }else return false;
        }else if(str[i] == ']')
        {
            if(!stk.empty())
            {
                if(stk.top() == '[')
                stk.pop();
                else return false;
            }else return false;
        }else stk.push(str[i]);
    }

    return stk.empty();
}

int Case;
void solve()
{
    int t;
    cin >> t;
    getchar();

    while(t--)
    {
        string str;
        getline(cin,str);
        if(f(str)) cout << "Yes" << endl;
        else cout << "No" << endl;

    }

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}