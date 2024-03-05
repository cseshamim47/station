#include <bits/stdc++.h>
using namespace std;

void hotelProb()
{
    int room, taken;
    cin >> room >> taken;
    int arr[room+1]{};
    for(int i = 1; i <= taken; i++) 
    {
        int x;
        cin >> x;
        arr[x] = 1;
    }

    for(int i = 1; i <= room; i++)
    {
        if(arr[i] == 0) 
        {
            cout << i << endl;
            return;
        }
    }
    cout << "too late" << endl;
}


void mapp()
{
    // key, value, lexicographically 

    map<string,int> info; // sorted order
    info["rabbi"] = 23;  
    info["ayz"] = 100;
    
    // iterator, pair
    for(auto x : info) 
    {
        cout << x.first << " " << x.second << endl;
    }
}

class parent
{
    public:
    void print(int x)
    {
        cout << "parent" << endl;
    }
};

class child : public parent
{
    public:
    void print(int x)
    {
        cout << "child" << endl;
        cout << x << endl;
    }
};

int main()
{
    child ch;
    ch.print(10);
    // or
    bitset<4> bit(11);
    bit.flip(2);
    cout << bit << endl;

    cout << (16>>2) << endl;
    cout << (2<<3) << endl;

    cout << (1|0) << endl; // op : 1
    cout << (1&0) << endl; // op : 0
    cout << !(1^0) << endl; // op : 0
    cout << (1^0) << endl; // op : 1

    cout << (32&31) << endl;


}