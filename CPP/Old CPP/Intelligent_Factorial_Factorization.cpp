#include <bits/stdc++.h>
using namespace std;

#define ll long long
#define MAX 105

bool p[MAX];
vector<int>primes;

void seive()
{
    for(int i = 3; i*i < MAX; i+=2)
    {
        if(!p[i])
        for(int j = i*i; j < MAX; j+=i)
        {
            p[j] = true;
        }
    }
    primes.push_back(2);
    for(int i = 3; i < MAX; i+=2)
    {
        if(!p[i]) primes.push_back(i);
    }
}
// Case 3: 6 = 2 (4) * 3 (2) * 5 (1)
void legendre(int n)
{
    for(int i = 0; primes[i] <= n; i++)
    {
        if(i != 0) cout << " * ";
        int cnt = 0;
        int tmp = primes[i];
        while(n/tmp != 0)
        {
            cnt += n/tmp;
            tmp *= primes[i];
        }
        cout << primes[i] << " (" << cnt << ")";
    }
}

int main()
{
    seive();
    int t;
    cin >> t;
    for(int i = 1; i <= t; i++)
    {
        int n;
        cin >> n;
        cout << "Case " << i << ": " << n << " = ";
        legendre(n);
        cout << "\n";
    }

}