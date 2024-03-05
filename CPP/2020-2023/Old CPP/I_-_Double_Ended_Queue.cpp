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
    int n,k;
    cin >> n >> k;
    deque<int> q;
    printf("Case %d:\n",++Case);
    while(k--)
    {
        string str;
        int x;
        cin >> str;
        if(str == "popLeft")
        {
            if(!q.empty())
            {
                cout << "Popped from left: " << q.front() << endl;
                q.pop_front();
            }else cout << "The queue is empty" << endl;
        }else if(str == "popRight")
        {
            if(!q.empty())
            {
                cout << "Popped from right: " << q.back() << endl;
                q.pop_back();
            }else cout << "The queue is empty" << endl;

        }else if(str == "pushLeft")
        {
            cin >> x;
            if(q.size() != n)
            {
                q.push_front(x);
                cout << "Pushed in left: " << x << endl;
            }
            else cout << "The queue is full" << endl;
        }else if(str == "pushRight")
        {
            cin >> x;
            if(q.size() != n)
            {
                q.push_back(x);
                cout << "Pushed in right: " << x << endl;
            }else cout << "The queue is full" << endl;
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