#include <bits/stdc++.h>
using namespace std;
#define MAX 1000001
#define ll long long

vector<int> primes;
int smPrimeFactor[MAX];

void seive()
{
    smPrimeFactor[1] = 1;

    for(int i = 2; i < MAX; i++)
    {
        smPrimeFactor[i] = i;
    }
    for(int i = 4; i < MAX; i+=2)
    {
        smPrimeFactor[i] = 2;
    }
    for(int i = 3; i*i < MAX; i++)
    {
        if(smPrimeFactor[i] == i)
        {
            for(int j = i*i; j < MAX; j+=i)
            {
                if(smPrimeFactor[j] == j)
                    smPrimeFactor[j] = i;
            }
        }
    }

}
int genFact(int n)
{
    int cnt = 0;
    while(n != 1)
    {
        cnt++;
        n /= smPrimeFactor[n];
    }
    return cnt;
}
int ans[MAX];
int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    seive(); /// O(Nlog(logN))

    for(int i = 2; i < MAX; i++)
    {
        ans[i] = ans[i-1] + genFact(i);
    }

    int n;
    while(cin >> n)
    {
        cout << ans[n] << "\n";
    }

}
