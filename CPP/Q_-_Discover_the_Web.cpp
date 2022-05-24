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

void f()
{}

int Case;
void solve()
{   
    printf("Case %lld:\n",++Case);
    stack<string> cur;
    stack<string> his;
    string home = "http://www.lightoj.com/";
    while(true)
    {
        string str;
        cin >> str;
        if(str == "VISIT")
        {
            cin >> str;
            cur.push(str);
            cout << str << endl;
            while(!his.empty()) his.pop();
        }else if(str == "BACK")
        {
            if(cur.size() == 1) 
            {
                cout << home << endl;
                his.push(cur.top());
                cur.pop();
            }else if(cur.size() >= 2)
            {
                his.push(cur.top());
                cur.pop();
                cout << cur.top() << endl;
            }else
            {
                cout << "Ignored" << endl;
            }
        }else if(str == "FORWARD")
        {
            if(!his.empty())
            {
                cout << his.top() << endl;
                cur.push(his.top());
                his.pop();
            }else
            {
                cout << "Ignored" << endl;
            }
        }else
        {
            break;
        }
    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}