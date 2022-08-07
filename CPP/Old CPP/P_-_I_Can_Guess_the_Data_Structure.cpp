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
    int q;
    while(cin >> q)
    {
        stack<int> s;
        queue<int> qu;
        priority_queue<int> pq;
        int bs = 0, bqu = 0, bpq=0,cnt=0;
        while(q--)
        {
            int a,b;
            cin >> a >> b;
            if(a == 1)
            {
                s.push(b);
                qu.push(b);
                pq.push(b);
            }else if(a == 2)
            {
                cnt++;
                if(!s.empty() && s.top() ==  b)
                {
                    bs++;
                    // cout << "stack : " << s.top() << endl;
                    s.pop();
                }
                if(!qu.empty() && qu.front() == b)
                {
                    bqu++;
                    qu.pop();
                }
                if(!pq.empty() && pq.top() == b)
                {
                    bpq++;
                    pq.pop();
                }
            }
        }

        if(bs+bqu >= cnt*2 || bs+bpq >= cnt*2 || bpq+bqu >= cnt*2)
        {
            cout << "not sure" << endl;
        }else if(bs < cnt && bqu < cnt && bpq < cnt)
        {
            cout << "impossible" << endl;
        }else if(bs==cnt)
        {
            cout << "stack" << endl;
        }else if(bqu==cnt)
        {
            cout << "queue" << endl;
        }else if(bpq==cnt)
        {
            cout << "priority queue" << endl;
        }
        
    }
}

int32_t main()
{
      //        Bismillah
    fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}