#include <bits/stdc++.h>
using namespace std;

const int N = 1e7+10;
bitset<N> isPrime;
vector<int> prime;
void sieve(int n)
{   
    for(int i = 2; i <= n; i++)
    {
        if(isPrime[i] == 0)
        {
            prime.push_back(i);
            for(int j = i*i; j <= n; j+=i)
            {
                isPrime[j] = 1; 
            }
        }
    }
}


int main()
{
    int l,r;
    cin >> l >> r;
    int sq = sqrt(r)+1;
    sieve(sq);
    int len = r-l+1;
    vector<int> segSieve(len+2,1);
    
    for(auto x : prime)
    {
        int start = ((l+x-1)/x)*x;
        for(int j = start; j <= r; j+=x)
        {
            segSieve[j-l] = 0;
        }
    }

    for(int i = l; i <= r; i++)
    {
        if(segSieve[i-l])
        {
            cout << i << " ";
        }
    }
    
}