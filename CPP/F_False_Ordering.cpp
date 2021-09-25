#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

vector<pair<int,int>> d;
void divisors()
{
    static int n = 1;
    if(n == 1001) return; 
    int cnt = 0;
    for(int i = 1; i*i <= n; i++)
    {
        if(n % i == 0)
        {
            cnt+=2;
            if(i == n/i) cnt--;
        } 
        
    }
    d.push_back({n,cnt});
    // cout << n << " " << d[n] << endl;
    n++;
    divisors();
}

bool cmp(pair<int,int> x,pair<int,int> y)
{
    if(x.second == y.second) return x.first > y.first;
    return x.second < y.second;
}

int Case;
void solve()
{
    int n;
    cin >> n;
    cout << "Case " << ++Case << ": " << d[n-1].first << endl;
}

int main()
{
      //        Bismillah
    divisors();
    sort(d.begin(),d.end(),cmp);
    w(t)
    
}