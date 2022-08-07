#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 10000010

bool isPrime[MAX];
vector<int> p;
void sieve()
{
    for(int i = 3; i*i <= MAX; i+=2)
    {
        if(!isPrime[i])
        {
            for(int j = i*i; j <= MAX; j+=i)
            {
                isPrime[j] = true;
            }
        }
    }
    p.push_back(2);
    for(int i = 3; i <= MAX; i+=2) if(!isPrime[i]) p.push_back(i);
}
int Case;
void solve()
{
    int n;
    cin >> n;
    int l = 0, r = lower_bound(p.begin(),p.end(),n) - p.begin();
    if(r == p.size()) r--;
    int cnt = 0;
    cout << "Case " << ++Case << ": ";
    while(l <= r)
    {
        int sum = p[l]+p[r];
        if(sum == n)
        {
            cnt++;
            l++; r--;
        }else if(sum < n) l++;
        else r--;
    }
    cout << cnt << endl;

}

int main()
{
      //        Bismillah
    
    sieve();
    w(t)
    
}