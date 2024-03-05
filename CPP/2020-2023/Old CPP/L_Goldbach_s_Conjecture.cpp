#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 10000067

bool isPrime[MAX];
vector<int>p;
void sieve()
{
    for(int i = 2; i*i < MAX; i++)
    {
        if(!isPrime[i])
        {
            for(int k = i*i; k < MAX; k+=i)
            {
                isPrime[k] = true;
            }
        }
    }
    p.push_back(2);
    for(int i = 3; i < MAX; i+=2)
    {
        if(!isPrime[i])
            p.push_back(i);
    }
}
int Case;
void solve()
{
    int n;
    cin >> n;
    int cnt = 0;
    int sizee = (int)p.size();
    // cout << size << endl;
    int l = 0; 
    int r = min(n,sizee-1);
    while(l <= r)
    { 
        int sum = p[l] + p[r];
        if(sum == n) cnt++;
        if(sum < n) l++;
        else r--;
    }
    cout << "Case " << ++Case << ": " << cnt << endl;
}

int main()
{
    sieve(); // nloglogn

    // for(int i = 0; i < 20; i++) cout << p[i] << endl;
    // cout << p.size() << endl;
    w(t)
    
}